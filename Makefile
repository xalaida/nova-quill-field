npm.install:
	docker run --rm --volume ./:/var/www --workdir /var/www/nova-quill-field node:14-alpine npm install

npm.run.prod:
	docker run --rm --volume ./..:/var/www --workdir /var/www/nova-quill-field node:14-alpine npm run prod
