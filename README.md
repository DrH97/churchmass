# ChurchMass

A platform to enable users search for churches and masses near them

## Getting Started
### Requirements
- PHP 8.4
- Node 23
- Composer
- Docker (optional)

### Setup
#### 1. Clone the repository
```shell
git clone https://github.com/DrH97/churchmass.git
```

#### 2. Install dependencies
```shell
composer install

npm install
```

#### 3. Build assets
```shell
npm run build
```

#### 4. Run
- Composer
```shell
composer run dev
```

- Docker Compose
```shell
docker compose up --build -d
```

## Todo

### Implement Geocoding & Maps

- Enable searching by address rather than lat,long coordinates.
- Display churches on a map thus enabling driving and walking distances to be calculated.


### Features Enhancement
- Enhancement of various functionalities like search and filtering of churches and masses more granularly.
- Improve the admin datatables and forms - pagination, sorting and filtering.
- Implement all CRUD functionality and make it seemless


### UI/UX
- Provide for a more unified design and user experience.
