import Model from '../core/models/Model';
import Validator from '../app/Validator/Validator';
import WalkThrough from '../app/WalkThrough/WalkThrough';

class Candidate extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
			name: { 
				type: 'text', 
				translation: 'Naam + achternaam', 
				validation: new Validator({
					required: true,
				})
			},

			phone_number: { 
				type: 'text', 
				translation: 'Telefoonnummer', 
				validation: new Validator({
					required: true,
					type: 'phoneNumber',
				})
            },
            
            email_address: { 
				type: 'text', 
				translation: 'Email', 
				validation: new Validator({
					required: true,
					type: 'email',
				})
            },
            
            date_of_birth: { 
				type: 'date', 
				translation: 'Geboortedatum',  
				validation: new Validator({
					required: true
				}),
				walkThrough: new WalkThrough([
					'Klik op het onderstaande invoerveld. U kunt vervolgens beginnen met typen.',
					'Voer hier de geboortedatum in. In het eerste veld kunt u de dag invoeren.',
					'In het tweede veld kunt u de maand invoeren. In het laatste veld kunt u het jaar invoeren.'
				]),
            },
            
            municipality: {
                type: "select",
                translation: "Gemeente ",
                choices: {
                    Noordenveld: 'Noordenveld',
                    Tynaarlo: 'Tynaarlo',
                    Assen: 'Assen',
                    MiddenDrenthe: 'Midden-Drenthe',
                    AaenHunze: 'Aa en Hunze',
                },
                validation: new Validator({
                    required: true,
                }),
            },

            message: {
                type: 'textarea',
                translation: "Bericht van de aanmelding.",
                validation: new Validator({
                    required: true,
                    max_string_length: 90,
                }),
                walkThrough: new WalkThrough([
                    'Klik op het grote tekstvak. U kunt vervolgens beginnen met typen.',
                    'Voeg een bericht toe voor deze aanmelding. U kunt hier maximaal 90 karakters invoeren.'
                ]),
            },

            subscription_type: {
                type: "select",
                translation: "Aanmelding voor: ",
                choices: {
                    mentor: 'Mentor',
                    jongere: 'Jongere',
                },
                validation: new Validator({
                    required: true,
                }),
            },



        };

    }


}

export default Candidate;
