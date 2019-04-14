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