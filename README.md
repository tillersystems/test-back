# Tiller Test Dev Backend

## What should I do ?
Write a webservice that combines two lists by alternatingly taking elements. For exemple: given two lists [A, B, C] and [1, 2, 3], the results sould be [A, 1, B, 2, C, 3]

ps: you're on a git, don't forget it ;)

## Where should I write my code ?
```
    //src/AppBundle/Controller/DefaultController
    
    public function indexAction(Request $request)
    {
        $list1 = $request->request->get('list1');
        $list2 = $request->request->get('list2');
        
        $finalList = array();

        /**
         * @TODO: 
         * Write a webservice that combines two lists by alternatingly taking 
         * elements. For exemple: given two lists [A, B, C] and [1, 2, 3], the 
         * results sould be [A, 1, B, 2, C, 3]
         */
        
        return new JsonResponse($finalList, JsonResponse::HTTP_OK);
    }
```

## How can I test my code ?
```bash
$ curl -H "Content-Type: application/json" -X POST -d '{ "list1": ["a", "b", "c"], "list2": [1, 2, 3] }' test.local
["a",1,"b",2,"c",3]
```
