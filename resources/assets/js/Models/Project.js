import Model from './Model';

class Project extends Model{

	save() {
		API.post('projects/save', this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	update() {
		API.post('projects/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	/**
	 * delete the current project
	 * @param  {Boolean} confirm , asks the user for a confirmation, default: false
	 * @param  {[type]}  callback , callback function, executes after the DELETE
	 * @return {[type]} void
	 */
	delete(confirm = false, callback) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('projects', this.id);
				callback();
			});
		}else{
			API.delete('projects', this.id);
			callback();
		}

	}

	static where(parameters, success, failure) {
		console.log(parameters);
		let data = "";

		for(let field in parameters) {
			data += field + '/' + parameters[field] + '/';
		}

		API.get('projects/where/' + data, (data) => {
			let all = [];
			for(let object in data) {
				let project = new Project(data[object]);
				all.push(project);
			}
			success(all);
		}, failure);
	}

	static all(success, failure) {
		API.get('projects', function(data) {
			let all = [];
			for(let object in data) {
				let project = new Project(data[object]);
				all.push(project);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('projects/' + id + '/edit', function(data){
			let project = new Project(data);
			success(project);
			Event.fire('projectLoaded');
		}, failure);
	}

}

export default Project;