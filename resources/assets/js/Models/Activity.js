import Model from './Model';

class Activity extends Model{

	save() {
		API.post('event/save', this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	update() {
		API.post('event/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('event', this.id);
				success();
			});
		}else{
			API.delete('event', this.id);
			success();
		}
	}

	static all(success, failure) {
		API.get('event', (data) => {
			let all = [];
			for(let object in data) {
				let newObject = new Activity(data[object]);
				all.push(newObject);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('event/' + id, (data) => {
			let activity = new Activity(data);
			success(activity);
			Event.fire('activityLoaded');
		}, failure);
	}

	with(relation, factory) {
		API.get('event/' + this.id + '/' + relation, (relationData) => {
			this[relation] = factory(relationData);
		});
	}
}

export default Activity;