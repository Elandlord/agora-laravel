import Model from './Model';

class Employee extends Model{

	save() {
		API.post('employees/save', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('employees/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('employees', this.id);
				success();
			});
		}else{
			API.delete('employees', this.id);
			success();
		}

	}

	static all(success, failure) {
		super.all('employees', data => new Employee(data), success, failure );
	}

	static find(id, success, failure) {
		super.find('employees/' + id, data => new Employee(data),  succes, failure);
	}

}
export default Employee;