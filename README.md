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
This will enable:
Searching by address rather than lat,long coordinates.

Displaying churches on a map thus enabling driving and walking distances to be calculated more accurately.


### Features Enhancement
Enhancement of various functionalities like search and filtering of churches and masses more granularly.

### UI/UX
Provide for a more unified design and user experience
