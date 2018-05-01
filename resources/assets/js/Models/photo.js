import Model from './Model';

class Photo extends Model{

	static modelName(){
		return 'photo';
	}

	save() {
		API.post(`${this.constructor.modelName()}/save`, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	update() {
		API.post(`${this.constructor.modelName()}/update/${this.id}`, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('photo', this.id);
				success();
			});
		}else{
			API.delete('photo', this.id);
			success();
		}
	}

	static all(success, failure) {
		API.get('photo', (data) => {
			let all = [];
			for(let object in data) {
				let newObject = new Photo(data[object]);
				all.push(newObject);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('photo/' + id, function(data){
			let photo = new Photo(data);
			success(photo);
			Event.fire('photo:loaded');
		}, failure);
	}

	with(relation, factory) {
		API.get('api/photo/' + this.id + '/' + relation, (relationData) => {
			this[relation] = factory(relationData);
		});

	}

}

export default Photo;