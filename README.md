Thanks to these conventions, accessing the database via `symfony run` is much easier:

```bash
symfony run psql
```

> [!NOTE]
> If you don't have the `psql` binary on your local host, you can also run it via Docker Compose:
>
> ```bash
> docker-compose exec database psql app app
> ```

## Dumping and Restoring Database Data

Use `pg_dump` to dump the database data:

```bash
symfony run pg_dump --data-only > dump.sql
```

And restore the data:

```bash
symfony run psql < dump.sql
```
