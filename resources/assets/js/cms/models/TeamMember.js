import Model from './Model';
import Validator from '../App/Validator';

class TeamMember extends Model {

    constructor(data = {}) {
        super(data);

        this.fields = {
            first_name: {
                type: 'text',
                translation: 'Voornaam',
                validation: new Validator({
                    required: true,
                })
            },

            last_name: {
                type: 'text',
                translation: 'Achternaam',
                validation: new Validator({
                    required: true,
                })
            },

            description: {
                type: 'textarea',
                translation: 'Voornaam',
                validation: new Validator({
                    required: true,
                })
            },

            role: {
                type: 'text',
                translation: 'Role',
                validation: new Validator({
                    required: true,
                })
            }

        };

    }


}

export default TeamMember;
