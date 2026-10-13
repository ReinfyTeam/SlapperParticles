# SlapperParticles

[![Poggit status](https://poggit.pmmp.io/shield.state/SlapperParticles)](https://poggit.pmmp.io/p/SlapperParticles)
[![Poggit API](https://poggit.pmmp.io/shield.api/SlapperParticles)](https://poggit.pmmp.io/p/SlapperParticles)

SlapperParticles displays rotating dust particles around `SlapperHuman` entities in PocketMine-MP worlds. Particle RGB values are read from the plugin configuration.

## Requirements

- PocketMine-MP API 5.
- The `Slapper` plugin, which provides the `slapper\entities\SlapperHuman` entity type.

The plugin is maintained for PocketMine-MP rather than for unverified forks or spoons. A server-side runtime check is required before claiming compatibility with a particular fork or server build.

## Installation

1. Install the `Slapper` dependency from [Poggit](https://poggit.pmmp.io/p/Slapper/).
2. Copy the SlapperParticles PHAR into the server's `plugins/` directory.
3. Start the server and confirm that SlapperParticles enables after Slapper.
4. Edit `plugin_data/SlapperParticles/config.yml` if you want different particle colors.

There is no standalone release artifact in this repository. Build or download the plugin through the repository's configured distribution path, and keep the `Slapper` dependency installed on the target server.

## Configuration

The default configuration uses white particles:

```yaml
Color A: 255
Color B: 255
Color C: 255
config-version: "1.0.2"
```

`Color A`, `Color B`, and `Color C` are the three integer color channels passed to PocketMine-MP's `Color` value. Use values in the `0`–`255` range. Keep `config-version` unchanged unless you are following a documented migration.

When the stored configuration version is not `1.0.2`, the plugin renames the existing file to `old-config.yml` and writes a fresh default configuration. Preserve that file before troubleshooting or manually migrating custom values.

## Development and verification

Install the development dependencies and run the static-analysis check:

```text
composer install
composer run-script analyse
```

The repository provides PHPStan analysis and a GitHub Actions build workflow, but no dedicated runtime test suite. A complete server verification still requires an API 5 server with Slapper, loaded worlds and observable SlapperHuman entities. The configured build service uses [DevTools](https://github.com/NhanAZ/DevTools) to package the plugin; user documentation refers to that function without copying a builder revision that may change over time.

## Support

For a reproducible issue, include the PocketMine-MP and Slapper versions, the SlapperParticles configuration, server log and reproduction steps. Report issues through the [GitHub issue tracker](https://github.com/ReinfyTeam/SlapperParticles/issues) or contact the [ReinfyTeam Discord server](https://discord.gg/v2rNeHaptd).

## License

SlapperParticles is licensed under the [GNU Lesser General Public License v2.1](LICENSE).
