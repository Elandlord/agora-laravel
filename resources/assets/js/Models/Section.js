import Model from './Model';

class Section extends Model{

  save() {
    API.post('section/save', this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  update() {
    API.post('section/update/' + this.id, this.data(), this.success, function() {
      // notify the user if something went wrong.
    });
  }

  delete(confirm = false, success) {
    if(confirm == true) {
      Notifier.askConfirmation(() => {
        API.delete('section', this.id);
        success();
      });
    }else{
      API.delete('section', this.id);
      success();
    }
  }

  static all(success, failure) {
    API.get('section', (data) => {
      let all = [];
      for(let object in data) {
        let newObject = new Page(data[object]);
        all.push(newObject);
      }
      success(all);
    }, failure);
  }

  static find(id, success, failure) {
    API.get('section/' + id + '/edit', function(data){
      let page = new Page(data);
      success(page);
      Event.fire('pageLoaded');
    }, failure);
  }

  static where(parameters, success, failure) {
    let data = "";
    for(let field in parameters) {
      data += field + '=' + parameters[field] + '&';
    }

    data = data.substring(0, data.length - 1);

    API.get('section/where?' + data, (page) => {
      let all = [];
      success(new Page(page));
    }, failure);
  }

}

export default Section;