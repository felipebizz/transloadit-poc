# Transloadit POC

[Transloadit Demo](https://transloadit.com/demos/exporting-files/store-uploaded-files-on-s3/)

[Transloadit PHP SDK](https://github.com/transloadit/php-sdk)

[Drag n Drop Plugin](https://github.com/tim-kos/transloadit-drag-and-drop)

[S3 Input File](https://transloadit.com/docs/conversion-robots/#s3-store)

[Auth Signature](https://transloadit.com/docs/#authentication)


## TODO
- Gerar Template
- Utilizar signeature de uma hora para garantir segurança
- Assemble_url salva dados no banco
- Notification_url salva info no rabbit
- Consumer para atualizar dados e executar regras adicionais
- php para mostrar o thumb sem exibir url do S3

## Install

With Docker and Composer installed in your system just run the following command on project root:

```bash
./bin/minion

3) Start

```

## Usage

### Minion (shell task manager)

Run `./bin/minion` and you will see this options:

1) Help

2) Build

3) Start

4) Close

5) Restart

6) Quit

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

```shell
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.
