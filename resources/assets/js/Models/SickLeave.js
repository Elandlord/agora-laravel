import Model from './Model';
class SickLeave extends Model
{
   save()
   {
      API.post('sickLeaves/', this.data(), this.success, function()
      {
         // notify the user if something went wrong. 
      });
   }
   update()
   {
      API.put('sickLeaves/' + this.id, this.data(), function() {}, function()
      {
         // notify the user if something went wrong. 
      });
   }
   delete(confirm = false, success)
   {
      if (confirm == true)
      {
         Notifier.askConfirmation(() =>
         {
            API.delete('sickLeaves', this.id);
            success();
         });
      }
      else
      {
         API.delete('sickLeaves', this.id);
         success();
      }
   }
   static all(success, failure)
   {
      API.get('sickLeaves', function(data)
      {
         let all = [];
         for (let object in data)
         {
            let sickLeave = new SickLeave(data[object]);
            all.push(sickLeave);
         }
         success(all);
      }, failure);
   }
   static find(id, success, failure)
   {
      API.get('sickLeaves/' + id + '/edit', function(data)
      {
         let sickLeave = new SickLeave(data);
         success(sickLeave);
         Event.fire('sickLeaveLoaded');
      }, failure);
   }
}
export default SickLeave;