# Models
Single camelcase: User, UserRole...

# Controllers
Single camelcase: LoginController, ProfileController

# Folders
Plural: 
- Coins > Events
- Users > Resources > Profiles > Controllers

# Views
Needs to follow folder structure to a specific controller rendiring the view
- web > coins (`section`) > coin (`controller name`) > show-buy-coins-form (`action name`) > show-buy-coins-form.blade.php (`action name`)
- web > users > resources > profiles > profile > about > about.blade.php

# Routes
- always plural

# Lang
- lang > en > web > users (`section`) > resources (`resource`) > profile (`controller name`) => inside `profile` organize array by action name
- lang > en > web > media (`section`) > media (`controller name`) => inside `media` organize array by action name
e.g.
```
'update' => [
        'video_updated' => 'Video successfully updated',
    ],
```

# Repositories
- Web > Media (`section`) > Repositories (`folder name Repositories`) > Media (`controller name`) > Update (`action name`) > UpdateMediaRepository (`any appropriate name`)
