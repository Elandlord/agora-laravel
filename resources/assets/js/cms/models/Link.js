import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Link extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            name: {
                type: 'text',
                translation: 'Naam',
                description: 'Naam van relatie',
                validation: new Validator({
                    required: true
                }),
            },

            url: {
                type: 'website',
                translation: 'Website',
                description: 'Link naar website',
                validation: new Validator({
                    required: true
                }),
            },

            photo: {
                type: 'photo',
                translation: 'Kies een foto',
                dimensions: {"16x9": 'landscape', "1x1": 'portrait'},
                validation: new Validator({
                    required: true
                }),
                hidden: ['read'],
            },
        };

    }


}

export default Link;
