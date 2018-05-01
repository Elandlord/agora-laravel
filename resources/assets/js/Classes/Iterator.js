export default class Iterator {
  constructor() {
    this.counter = 0;
    this.data = null;
  }


  boot(data) {
    this.data = data;
  }

  unlock(callback) {
    console.log('unlocking the iterator');
    this.locked = false;
  }

  lock() {
    console.log('locking the iterator');
    this.locked = true;
  }

  next() {
    if(this.locked) {
      console.log('next method is locked');
      return ;
    }

    if(this.counter < this.data.length) {
      this.counter++;
    }
    console.log('calling next');
    return this;
  }

  attribute(attr) {
    if(this.locked) {
      console.log('attribute method is locked');
      return ;
    }
    console.log('returning the ' , attr , 'attribute');

    return this.data[this.counter][attr];
  }

}