import Model from './Model';

class Week extends Model{
	
	save() {
		API.post('weeks/create', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('weeks' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete() {
		API.delete('weeks', this.id);
	}

	static available(success, failure ) {
		API.get('weeks/available', function(data) {
			success(data);
		}, failure);
	}

	
	
	// static all(success, failure) {
	// 	super.all('weeks', data => new Week(data), success, failure);
	// }

	static find(id, success, failure) {
		super.find('weeks', data => new Week(data), success, failure);
	}

}

export default Week;