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
- lang > en > web > users (`section`) > resources (`resource`) > profile (`controller name`) - inside `profile` organize array by action name
- lang > en > web > coins (`section`) > coins (`controller name`) - inside `coins` organize array by action name
e.g.
```
'show_buy_coins_form' => [
        'buy_coins' => 'Buy NaughtyCoins',
        'buy' => 'Buy',
        'number_of_coins' => 'Number of NaughtyCoins',
        'total_in_dollars' => 'Total in US dollars',
    ],
```

# Repositories