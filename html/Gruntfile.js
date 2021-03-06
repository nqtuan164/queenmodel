// JavaScript source code
'use strict';

module.exports = function (grunt) {
    // load all grunt tasks
    grunt.loadNpmTasks('grunt-contrib-jade');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        watch: {
            // if any .less file changes in directory "public/css/" run the "less"-task.
            less: {
                files: ["less/*.less"],
                tasks: ["less"]
            }, 
            jade: {
                files: ["jade/*.jade"],
                tasks: ["jade"]
            }
        },
        jade: {
            compile: {
                options: {
                    pretty: true
                }, 
                files: [{
                    expand: true, 
                    cwd: 'jade', 
                    src: ['**/*.jade'], 
                    dest: '', 
                    ext: '.html'
                }]
            }
        },
        // "less"-task configuration
        less: {
            html: {
                files: {
                    "css/style.css": "less/style.less"
                }
            },
            // theme: {
            //     files: {
            //         // compilation.css  :  source.less
            //         "app/themes/frontend/assets/style.css": "app/themes/frontend/assets/less/style.less"
            //     }
            // }
        },
    });
    // the default task (running "grunt" in console) is "watch"
    grunt.registerTask('default', ['watch']);
};