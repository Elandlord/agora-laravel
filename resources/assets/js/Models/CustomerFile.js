import Model from './Model';

class CustomerFile extends Model{


  create(success) {
    API.post('customerFiles', this.data(), success, () => {});
  }

  update() {
    API.post('customerFiles' + this.id, this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  delete(confirm = false, success) {
    if(confirm == true) {
      Notifier.askConfirmation(() => {
        API.delete('customerFiles', this.id);
        success();
      });
    }else{
      API.delete('customerFiles', this.id);
      success();
    }
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

export default CustomerFile;