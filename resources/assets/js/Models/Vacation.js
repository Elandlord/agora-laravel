import Model from './Model';

class Vacation extends Model{

	save() {
		API.post('vacations/save', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('vacations/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('vacations', this.id);
				success();
			});
		}else{
			API.delete('vacations', this.id);
			success();
		}

	}

	static all(success, failure) {
		API.get('vacations', function(data) {
			let all = [];
			for(let object in data) {
				let vacation = new Vacation(data[object]);
				all.push(vacation);
			}
			success(all);
			Event.fire('vacationsLoaded');
		}, failure);
	}

	static find(id, success, failure) {
		API.get('vacations/' + id + '/edit', function(data){
			let vacation = new Vacation(data);
			success(user);
			Event.fire('vacationLoaded');
		}, failure);
	}
}

export default Vacation;