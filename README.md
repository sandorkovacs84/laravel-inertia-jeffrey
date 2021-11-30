## Installation 

* php 7.4 ( arrow functions )

* composer create-project laravel/laravel laravel-inertia
* composer require laravel/jetstream
* php artisan jetstream:install inertia
* npm install && npm run dev 
* mysql -uhomestead -psecret -e "create database lij";
* php artisan migrate


## Tutorial - Workshop 

### 1. Create Pages and implement Navigatoin 

* Home.vue
* Settings.vue
* Users.vue 

* Shared/Nav.vue
* Shared/NavLink.vue 

### 2. Create Layout 

* Shared/Layout.vue

### 3. Shared data 

* Edit HandleInertiaRequestsphp 

### 4. Persistent Layout

import Layout from '../Shared/Layout'

export default {
    layout: Layout,
}

### 5. Pagination


### 6. Filter and search


### 7. Createe -> diff between ref and reactive ( used for objects )

