'use strict';

angular.module('confusionApp')
        .constant("baseURL","http://localhost:3000/")
        .service('menuFactory', ['$resource', 'baseURL', function($resource, baseURL) {
    
                this.getDishes = function() {
                    return $resource(baseURL+"dishes/:id",null,{'update':{method: 'PUT'}});
                };
                
                this.getPromotion = function() {
                    return $resource(baseURL+"promotions/:id",null,{'update':{method: 'PUT'}});
                };
        }])

        .service('corporateFactory', ['$resource', 'baseURL', function($resource, baseURL) {
    
     
            // Implement two functions, one named getLeaders,
            // the other named getLeader(index)
            // Remember this is a factory not a service
            this.getLeaders = function() {
                return $resource(baseURL+"leadership/",null,{'update':{method: 'PUT'}});
            };
            this.getLeader = function() {
                return $resource(baseURL+"leadership/:id",null,{'update':{method: 'PUT'}});
            };    
    
        }])

        .service('feedbackFactory', ['$resource', 'baseURL', function($resource, baseURL) {
        
            this.putFeedback = function() {
                return $resource(baseURL+"feedback",null,{'update':{method: 'PUT'}});
            };    
        
        }])

;