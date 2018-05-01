import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Mentor extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            first_name: {
                type: 'text',
                translation: 'Voornaam',
                description: 'Voornaam van mentor',
                validation: new Validator({
                    required: true
                }),
            },

            last_name: {
                type: 'text',
                translation: 'Achternaam',
                description: 'Achternaam van mentor',
                validation: new Validator({
                    required: true
                }),
            },

            description: {
                type: 'textarea',
                translation: 'Beschrijving',
                description: 'Beschrijving van mentor',
                validation: new Validator({
                    required: true
                }),
            },

            date_of_birth: {
                type: 'date',
                translation: 'Geboortedatum',
                description: 'Geboortedatum van mentor',
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

export default Mentor;
