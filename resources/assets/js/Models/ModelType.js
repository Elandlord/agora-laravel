import Model from './Model';

class ModelType extends Model{
	
	save() {
		API.post('overview/create', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('overview' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete() {
		API.delete('overview', this.id);
	}
	
	static all(success, failure) {
		API.get('filters/overview', function(data) {
			let all = [];
			for(let object in data) {
				let modelType = new ModelType(data[object]);
				all.push(modelType);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('overview/' + id + '/edit', function(data){
			let modelType = new ModelType(data);
			success(modelType);
			Event.fire('overviewsLoaded');
		}, failure);
	}

}

export default ModelType;