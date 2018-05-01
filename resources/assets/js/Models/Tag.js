import Model from './Model';

class Tag extends Model{

	
	save() {
		API.post('tag/save', this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	update() {
		API.post('tag/update/' + this.id, this.data(), this.success, function() {
			// notify the user if something went wrong. 
		});
	}

	delete(confirm = false, success) {
		if(confirm == true) {
			Notifier.askConfirmation(() => {
				API.delete('tag/remove', this.id);
				success();
			});
		}else{
			API.delete('tag/remove', this.id);
			success();
		}

	}
	static all(success, failure) {
		super.all('tag', data => new Tag(data), success, failure );
	}

	static find(id, success, failure) {
		API.get('tag/' + id + '/edit', function(data){
			let tag = new Tag(data);
			success(tag);
			Event.fire('tagLoaded');
		}, failure);
	}

}

export default Tag;