# KatsConnect
COSC 4319 Semester Project

Cloning the repository (using git bash):
1. Navigate to folder you want to store project in
2. git clone [url]

Typical Workflow:
1. git pull origin          # Pulls latest repository image

2. git branch [name]        # Creates branch <name> using current local repository image
3. git checkout [branch]    # Checks out branch, meaning any modifications made will be made on this branch
 
 OR
 
2. git checkout [name]      # Checkout branch you'll be working on
3. git branch [name]        # Branch off of it (ex name: tutorkats_search_chris_20181013)

4. do your work             
5. git add [file] [file]                 # Stage files for commit
6. git status                            # Show summary of staged files
7. git commit -m [msg]                   # Commit the changes (locally)
8. git pull --rebase origin <branch>     # Pull the latest copy of the branch (rebase adds your commit on top)
9. git push origin [branch]
 
Conflict Handling during push
1. git status                            # to see what it is
2. edit files to resolve conflict
3. git add [file] [file]                 # Stage files
4. git rebase --continue                 # Let rebase do the rest
5. git rebase --abort                    # If you're unsure of what to do
 
Gitignore
When working on a project, there will probably be a lot of files you will need to modify and commit at once.
It's generally recommended to commit one file at a time, but thats not always the deal.
by creating a file in your working directory called ".gitignore" (without quotes), you can add directories and
files for git to ignore when staging. This allows you to use the "git add -a" command, which will add ALL modified
files that are NOT in your .gitignore

The easiest way to create the file is to navigate to your working directory in git bash and type "touch .gitignore"

There is a lot more to using git, but above are the basics you need to get started. Github has a tutorial that you can follow along when you create your own repository for the first time. I also placed a couple of useful resources for understanding the workflow and for an open source project that anyone can contribute to as a way to practice pulling/pushing remote.

NOTES:
Always remember to COMMIT then PUSH when you are done working. God forbid your computer dies or something and all that work is lost.
I'm not a big fan of forking. It makes things really confusing if no one is orchestrating it. However, if someone wants to learn how all that fun stuff works and take charge, be my guest.
