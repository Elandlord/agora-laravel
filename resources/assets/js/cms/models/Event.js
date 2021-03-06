import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Event extends Model {

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
            
            location: { 
				type: 'text', 
				translation: 'Locatie', 
				validation: new Validator({
					required: true,
				})
            },
            
            date: { 
				type: 'date', 
				translation: 'Datum', 
				validation: new Validator({
					required: true,
				})
            },
            
            description: {
                type: 'textarea',
                translation: "Beschrijving.",
                validation: new Validator({
                    required: true,
                    max_string_length: 90,
                }),
                walkThrough: new WalkThrough([
                    'Klik op het grote tekstvak. U kunt vervolgens beginnen met typen.',
                    'Voeg een bericht toe voor deze aanmelding. U kunt hier maximaal 90 karakters invoeren.'
                ]),
            },
            
            time_start: { 
				type: 'time', 
				translation: 'Starttijd', 
				validation: new Validator({
					required: true,
				})
            },

            time_end: { 
				type: 'time', 
				translation: 'Einddtijd', 
				validation: new Validator({
					required: true,
				})
            },

            price: { 
				type: 'number', 
				translation: 'Prijs', 
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

export default Event;
