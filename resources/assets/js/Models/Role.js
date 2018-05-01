import Model from './Model';

class Role extends Model{

	save() {
		API.post('roles/save', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('roles/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('roles', this.id);
				success();
			});
		}else{
			API.delete('roles', this.id);
			success();
		}

	}

	static all(success, failure) {
		API.get('roles', function(data) {
			let all = [];
			for(let object in data) {
				let role = new Role(data[object]);
				all.push(role);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('roles/' + id + '/edit', function(data){
			let role = new Role(data);
			success(role);
			Event.fire('roleLoaded');
		}, failure);
	}

}

export default Role;