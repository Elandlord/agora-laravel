import Model from './Model';
import Validator from '../App/Validator';

class Partner extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            name: {
                type: 'text',
                translation: 'Naam',
                validation: new Validator({
                    required: true,
                }),
            }, 
            
            description: {
                type: 'textarea',
                translation: 'Beschrijving',
                validation: new Validator({
                    required: true,
                }),
            },

            date_started: {
                type: 'date',
                translation: 'Datum start samenwerking',
                validation: new Validator({
                    required: true,
                }),
            }
        };

    }


}

export default Partner;
