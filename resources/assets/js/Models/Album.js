import Model from './Model';

class Album extends Model{
  static prefix() {
    return 'album';
  }

  save() {
    API.post(`${this.prefix()}/save`, this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  update() {
    API.post(`${this.prefix()}update/` + this.id, this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  delete(confirm = false, success) {
    if(confirm == true) {
      Notifier.askConfirmation(() => {
        API.delete(this.prefix(), this.id);
        success();
      });
    }else{
      API.delete(this.prefix(), this.id);
      success();
    }
  }

  static all(success, failure) {
    API.get(this.prefix(), (data) => {
      let all = [];
      for(let object in data) {
        let newObject = new Album(data[object]);
        all.push(newObject);
      }
      success(all);
    }, failure);
  }

  static find(id, success, failure) {
    API.get(`${this.prefix()}/` + id, (data) => {
      let album = new Album(data);
      success(album);
      Event.fire('album:loaded');
    }, failure);
  }

  with(relation, factory) {
    API.get(`album/${this.id}/${relation}`, (relationData) => {
      this[relation] = factory(relationData);
    });
  }
}

export default Album;