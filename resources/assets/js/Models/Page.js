import Model from './Model';
import Section from './Section';

class Page extends Model{

	save() {
		API.post('page/save', this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	update() {
		API.post('page/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('page', this.id);
				success();
			});
		}else{
			API.delete('page', this.id);
			success();
		}
	}

	static all(success, failure) {
		API.get('page', (data) => {
			let all = [];
			for(let object in data) {
				let newObject = new Page(data[object]);
				all.push(newObject);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('page/' + id + '/edit', function(data){
			let page = new Page(data);
			success(page);
			Event.fire('pageLoaded');
		}, failure);
	}

	static where(parameters, success, failure) {
		console.log(parameters);
		let data = "";

		for(let field in parameters) {
			data += field + '/' + parameters[field] + '/';
		}

		API.get('section/where/' + data, (data) => {
			let all = [];
			if(data.length == 1) {
				success(new Page(data[0]));
			}else{
				for(let object in data) {
					let page = new Page(data[object]);
					all.push(page);
				}
				success(all);
			}
		}, failure);
	}

	with(relation, factory) {
		API.get('page/' + this.id + '/' + relation, (relationData) => {
			this[relation] = [];
			relationData.forEach((data) => {
				this[relation].push(factory(data));
			});

			if(this[relation].length == 0) {
				delete this[relation];
			}

		});

	}

}

export default Page;