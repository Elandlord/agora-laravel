import Model from './Model';
import Validator from '../App/Validator';

class Section extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            title: {
                type: 'text',
                translation: 'Titel',
                validation: new Validator({
                    required: true,
                }),
            }, 
            
            body: {
                type: 'textarea',
                translation: 'Inhoud',
                validation: new Validator({
                    required: true,
                }),
            },
        };

    }


}

export default Section;
