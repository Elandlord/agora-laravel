import Model from './Model';

class Media extends Model{


  create(success) {
    API.post('media', this.data(), success, () => {});
  }

  update() {
    API.post('media' + this.id, this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  delete(confirm = false, success) {
    if(confirm == true) {
      Notifier.askConfirmation(() => {
        API.delete('media', this.id);
        success();
      });
    }else{
      API.delete('media', this.id);
      success();
    }
  }

  static all(success, failure) {
    API.get('media', (data) => {
      let all = [];
      for(let object in data) {
        let newObject = new Media(data[object]);
        all.push(newObject);
      }
      success(all);
    }, failure);
  }

  static find(id, success, failure) {
    API.get('media/' + id + '/edit', function(data){
      let customer = new Customer(data);
      success(customer);
      Event.fire('media.loaded');
    }, failure);
  }
}

export default Media;