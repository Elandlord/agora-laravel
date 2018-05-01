
        /*
        |--------------------------------------------------------------------------
        | Import
        |--------------------------------------------------------------------------
        |
        | Import your models here
        | 
        | 
        |
        */
        
        import News from './models/news';
        import EventEntity from './models/event';
        
    
        /*
        |--------------------------------------------------------------------------
        | Insert
        |--------------------------------------------------------------------------
        |
        | Insert your models in the models object below.
        | 
        | 
        |
        */
    
        window.models = {
            news: News,
            event: EventEntity,
        };
            
        