import Model from './Model';

class Hour extends Model{

	constructor(data) {
		super(data);
		this.hours = this.inHours();
	}

	save() {
		API.post('hours/create', this.data(), this.success, function() {
			// notify the user if something went wrong.
		});
	}

	static where(parameters, success, failure) {
		let data = "";
		for(let field in parameters) {
			data += field + '=' + parameters[field] + '&';
		}

		data = data.substring(0, data.length - 1);

		API.get('hours/where?' + data, (hours) => {
			let all = [];
			for(let object in hours) {
				let hour = new Hour(hours[object]);
				all.push(hour);
			}
			success(all);
		}, failure);
	}



	update(success, failure) {
		this.recalculate();
		API.put('hours/' + this.work_date, this.data(), () => {
			success();
		}, failure);
	}

	delete() {
		API.delete('hours', this.id);
	}


	static rawAll(success, failure) {
		API.get('hours', function(data) {
			success(data);
		}, failure);
	}

	static find(id, success, failure) {
		API.get('hours/' + id + '/edit', function(data){
			let hour = new Hour(data);
			success(hour);
			Event.fire('hoursLoaded');
		}, failure);
	}

	// CLASS SPECIFIC FUNCTIONS
	static toHours(data) {
		let hours = [];
	    for(let hour in data){
	       let newHour =  data[hour];
	       newHour = new Hour(newHour);
	       hours.push(newHour);
	    }
	    return hours;
	}

	inHours() {
		let total = (this.total_seconds / 60 / 60 ) * 10
		return Math.round(total) / 10;
	}

	recalculate() {
		this.total_seconds = this.hours * 60 * 60;
	}

	static sum(callback, by = 'total_seconds') {
      let hours = [];
      let totalSeconds = 0;

      hours = callback();
      totalSeconds = _.sumBy(hours, by);

      return Helper.decimalRound(totalSeconds / 60 / 60, 1);
   	}

}

export default Hour;