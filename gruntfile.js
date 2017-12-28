module.exports = function (grunt) {
  grunt.initConfig({
    // Watch task config
    watch: {
        styles: {
            files: "SCSS/*.scss",
            tasks: ['sass', 'postcss'],
        },
    },
    sass: {
        dev: {
            files: {
                "style.min.css" : "SCSS/style.scss",
            }
        }
    },
    postcss: {
        options: {
            map: {
                inline: false,
            },

            processors: [
                require('pixrem')(), // add fallbacks for rem units
                require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                require('cssnano')() // minify the result
            ]
        },
        dist: {
            src: '*.min.css',
        }
    },
    browserSync: {
        dev: {
            bsFiles: {
                src : ['*.css', '**/*.js', '**/*.php', '**/*.svg', '!node_modules'],
            },
            options: {
                watchTask: true,
                open: "external",
                host: "andrews-macbook-pro.local",
                proxy: "https://ghc.dev",
                https: {
                    key: "/Users/andrew/github/dotfiles/local-dev.key",
                    cert: "/Users/andrew/github/dotfiles/local-dev.crt",
                }
            },
        },
    },
  });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.registerTask('default', [
        'browserSync',
        'watch',
    ]);
};
