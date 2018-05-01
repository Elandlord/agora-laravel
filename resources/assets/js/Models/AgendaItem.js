import Model from './Model';

class AgendaItem extends Model{
  create(success) {
    API.post('event', this.data(), success, () => {});
  }

  update() {
    API.post('event' + this.id, this.data(), this.success, function() {
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
        let newObject = new AgendaItem(data[object]);
        all.push(newObject);
      }
      success(all);
    }, failure);
  }

  static search(searchParameters, success, failure){
      API.get('event?searchParameters=' + searchParameters, (data) => {
      let all = [];
      for(let object in data) {
        let newObject = new AgendaItem(data[object]);
        all.push(newObject);
      }
      success(all);
    }, failure);
  }

  static find(id, success, failure) {
    API.get('event/' + id + '/edit', function(data){
      let agendaItem = new AgendaItem(data);
      success(customer);
      Event.fire('event.loaded');
    }, failure);
  }
}

export default AgendaItem;