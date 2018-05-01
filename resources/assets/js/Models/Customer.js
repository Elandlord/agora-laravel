import Model from './Model';

class Customer extends Model{

	save() {
		API.post('customers/save', this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	update() {
		API.post('customers/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('customers', this.id);
				success();
			});
		}else{
			API.delete('customers', this.id);
			success();
		}
	}

	customerFiles() {
		return new Promise((resolve, reject) => {
			API.get(`customerFiles/${this.id}`, (data) => {
				let all = [];
				for(let object in data) {
					let newObject = new CustomerFile(data[object]);
					all.push(newObject);
				}
				resolve(all);
			});
    });
	}

	static all(success, failure) {
		API.get('customers', (data) => {
			let all = [];
			for(let object in data) {
				let newObject = new Customer(data[object]);
				all.push(newObject);
			}
			success(all);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('customers/' + id + '/edit', function(data){
			let customer = new Customer(data);
			success(customer);
			Event.fire('customerLoaded');
		}, failure);
	}

}

export default Customer;