import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Competence extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            // name: new textField().addValidation({}).addTranslation().hidden(['read']),
            name: {
                type: 'text',
                translation: "Benaming voor de competentie.",
                validation: new Validator({
                    required: true,
                    max_string_length: 30,
                }),
                walkThrough: new WalkThrough([
                    'Klik op het kleine tekstvak. U kunt vervolgens beginnen met typen.',
                    'Voeg een benaming toe voor deze competentie. U kunt hier maximaal 30 karakters invoeren.',
                    'Voorbeelden: "Leeftijd", "Gemotiveerd"',
                ]),

            },

            description: {
                type: 'textarea',
                translation: "Korte uitleg over de competentie.",
                validation: new Validator({
                    required: true,
                    max_string_length: 90,
                }),
                walkThrough: new WalkThrough([
                    'Klik op het grote tekstvak. U kunt vervolgens beginnen met typen.',
                    'Voeg een beschrijving toe voor deze competentie. U kunt hier maximaal 90 karakters invoeren.'
                ]),
            },

            type: {
                type: "select",
                translation: "Competentie voor: ",
                choices: {
                    mentor: "mentoren", 
                    youth: "jongeren"
                },
                validation: new Validator({
                    required: true,
                }),
            },

            icon:  {
                type: "icon",
                translation: "Kies een icoontje",
                validation: new Validator({
                    required: true,
                }),
            }

        };

    }


}

export default Competence;
