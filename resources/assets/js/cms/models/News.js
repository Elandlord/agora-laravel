import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class News extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            title: { 
				type: 'text', 
				translation: 'Titel', 
				validation: new Validator({
					required: true,
				})
            },

            body: {
                type: 'textarea',
                translation: "Bericht",
                validation: new Validator({
                    required: true,
                    max_string_length: 90,
                }),
                walkThrough: new WalkThrough([
                    'Klik op het grote tekstvak. U kunt vervolgens beginnen met typen.',
                    'Voeg een bericht toe voor deze aanmelding. U kunt hier maximaal 90 karakters invoeren.'
                ]),
            },

            author: { 
				type: 'text', 
				translation: 'Titel', 
				validation: new Validator({
					required: true,
				})
            },

            publish_date: { 
				type: 'date', 
				translation: 'Publicatiedatum', 
				validation: new Validator({
					required: true,
				})
            },

            occurence_date: { 
				type: 'date', 
				translation: 'Datum van gebeurtenis', 
				validation: new Validator({
					required: true,
				})
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

export default News;
