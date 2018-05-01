import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Organisation extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            name: {
                type: 'text',
                translation: 'Organisatie naam',
                description: 'Naam',
                validation: new Validator({
                    required: true
                }),
            },

            website: {
                type: 'website',
                translation: 'website',
                validation: new Validator({
                    required: true,
                })
            }
          
        };

    }


}

export default Organisation;