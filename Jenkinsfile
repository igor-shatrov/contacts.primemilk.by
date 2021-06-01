
pipeline {
    agent any
    
    
        
    

    stages {
        stage('git') {
            steps {
               git 'https://github.com/igor-shatrov/contacts.primemilk.by.git'
            }
        }
        stage('Push') {
            steps {
                sh "ls"
                sshPublisher(publishers: [sshPublisherDesc(configName: 'yoda', transfers: [sshTransfer(cleanRemote: false, excludes: 'php/*', execCommand: 'ls', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: 'contacts.primemilk.by', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '**/*'), sshTransfer(cleanRemote: false, excludes: '', execCommand: 'sudo service nginx reload', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: 'api.contacts.primemilk.by', remoteDirectorySDF: false, removePrefix: '', sourceFiles: 'php/*')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
            }
        }
    }
}
