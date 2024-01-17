# Vue example & deployment
Environment deployment<br><br>
1.install node.js Windows：Download the install package from node.js official site。

macOS：brew install node1。

Ubuntu：sudo apt-get install -y nodejs4。

type node -v to check node.js version Under the Windows operating system

2.install vue.js

After instaled node.js, we can create a folder and use cmd to cd the folader. <br>
Under the folder type "npm install -g @vue/cli" to install vue project. <br>
And check if Vue.js installed successfully. type"vue --version"<br>

3.create project <br>
under the folder, type "npm init vue@latest", this will lead a series of question like the project name and what tools to use.. and so on. <br>

4.create project file <br>
There would be four important files to get it know after create project. a~d.<br><br>

a. under myproject/src/main.js<br>
b. under myproject/src/App.vue<br>
c. under myproject/src/components/HelloWorld.vue<br>
d. under myproject/public/index.html<br>

When project being start the webpack will go to these four files in order.<br>
a. main.js this file will be the entry point of a Vue application”. //應用程式入口點<br>
b. this file is the vue instance which will be render in a.<br>
c. this will be render in b. Other kind of file will be same way to render. So on and so forth.<br>
d. all the b and c will be injure in this file and show on our screen.<br>

5.edit file in file b, there will be three different content. taghtml contnet, tag<script>js content</script>, and tag<style>css content</style>.

6.test and see example in this repository.

type"npm run serve" under the path of this project, then type localhost:8888/ in browser address bar to start!

to stop press ctrl+c

P.S. 雖然全域安裝的套件看起來很方便，但是它們可能會導致版本管理的問題。例如，如果當兩個專案都依賴於同一個套件，但是需要使用該套件的不同版本，那麼全域安裝就無法滿足這種需求。因此，通常建議在每個專案中局部安裝所需的套件。
