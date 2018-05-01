import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Project extends Model {

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

            date: {
                type: 'date',
                translation: 'Datum',
                description: 'Datum van project',
                validation: new Validator({
                    required: true
                }),
            },

            residence: {
                type: 'text',
                translation: 'Locatie',
                validation: new Validator({
                    required: true,
                }),
            }, 

            discipline_id: {
                type: 'model',
                model: 'discipline',
                referenceField: 'name',
                translation: 'Behoort tot discipline',
                description: 'Discipline',
                validation: new Validator({
                    required: true
                }),
            },

            client: {
                type: 'text',
                translation: 'Klant',
                validation: new Validator({
                    required: true,
                }),
            }, 

            photo: {
                type: 'multi_photo',
                translation: 'Kies een foto',
                dimensions: {"1x1": 'portrait', "16x9": 'landscape'},
                validation: new Validator({
                    required: true
                }),
                hidden: ['read'],
            },
        };

    }


}

export default Project;
