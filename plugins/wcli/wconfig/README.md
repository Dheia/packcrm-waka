#  Wconfig centre pivot des ressources 
Ce plugin regroupe les informations transverses
* Les datasources
* Les déclaration de config transverses
* les requêtes salesforce si le plugin est installé


## datasource
Dans le dossier config il faut créer un fichier datasource
un fichier datasource est en yaml et comporte les éléments suivants :

```
client:
    label: Client
    code: client
    test_id: 9
    author: Waka
    plugin: Crm
    name : Client
    class: Wcli\Crm\Models\Client
    controller: wcli/crm/clients
    editFunctions: Wcli\Wconfig\Functions\Client
    attributes: wcli/crm/models/client/attributes.yaml
    publications:
        types: 
            Waka\Worder\Models\Document: Word
            Waka\Pdfer\Models\WakaPdf: Pdf
    emails:
        to: 
            key: email
            relation: contacts
        cc: 
            key: email
            relation: contacts
    relations:
        sector:
            images: true
            label: Secteur
            attributes: wcli/crm/models/sector/attributes.yaml
contact:
    label: Contact
    code : contact
    test_id: 48
    author: Waka
    plugin: Crm
    name : Contact
    class: Wcli\Crm\Models\Contact
    # controller: wcli/crm/contacts #si le controller suit les nomenclature inutile de le saisir
    # editFunctions: Wcli\Wconfig\Functions\Contact # Si suit les  nomenclatures inutile de le saisir
    # attributes: wcli/crm/models/contact/attributes.yaml # Si suit les nomenclatures inutile de le saisir
    emails:
        to: 
            key: email
        cc: 
            key: email
            relation: client.contacts
    relations:
        client: 
            label: Client
            images: true #Ordonne de recuperer les images du modèle
            # attributes: wcli/crm/models/client/attributes.yaml # Si suit les nomenclature et même plugin inutile de le saisir
        client.sector: 
            label: Client
            attributes: wcli/crm/models/sector/attributes.yaml
    publications:
        types: 
            Waka\Worder\Models\Document: Word
            Waka\Pdfer\Models\WakaPdf: Pdf
            cloudi_one.picture_1: Image 1 (si existe)
            cloudi_one.picture_2: Image 2 (si existe)

```



## Why Magic Forms?
Almost everyday we do forms for our clients, personal projects, etc

Sometimes we need to add or remove fields, change validations, store data and at some point, this can be boring and repetitive.

So, the objective was to find a way to just put the HTML elements on the page, skip the repetitive task of coding and (with some kind of magic) store this data on a database or send by mail.



## Features
* Create any type of form: contact, feedback, registration, uploads, etc
* Write only HTML
* Don't code forms logic
* Laravel validation
* Custom validation errors
* Use multiple forms on same page
* Store on database
* Export data in CSV
* Access database records from backend
* Send mail notifications to multiple recipients
* Auto-response email on form submit
* reCAPTCHA validation
* Support for Translate plugin
* Inline errors with fields (read documentation for more info)
* AJAX file uploads (BETA, available since v1.3.0)



## Documentation
Checkout our docs at:
> https://skydiver.github.io/october-plugin-forms/
