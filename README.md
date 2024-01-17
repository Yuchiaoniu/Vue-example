# Vue example & deployment
Environment deployment<br><br>
1.install node.js Windows：Download the install package from node.js official site。

macOS：brew install node1。

Ubuntu：sudo apt-get install -y nodejs4。

type node -v to check node.js version Under the Windows operating system

2.install vue.js

After instaled node.js, we can create a folder and use cmd to cd the folader. Under the folder type "npm install -g @vue/cli" to install vue project. And check if Vue.js installed successfully. type"vue --version"

3.create project go to the folder we just created, and then type"vue create " change the to the name we need.

4.create project file There would be four important files. a~d.

a. under yourproject/src/main.js
b. under yourproject/src/App.vue
c. under yourproject/src/components/HelloWorld.vue
d. under yourproject/public/index.html

When project being start the webpack will go to these four files in order.
a. main.js this file will be the entry point of a Vue application”. //應用程式入口點
b. this file is the vue instance which will be render in a.
c. this will be render in b. Other kind of file will be same way to render. So on and so forth.
d. all the b and c will be injure in this file and show on our screen.

5.edit file in file b, there will be three different content. taghtml contnet, tag<script>js content</script>, and tag<style>css content</style>.

6.test and see example in this repository.

type"npm run serve" under the path of this project, then type localhost:8888/ in browser address bar to start!

to stop press ctrl+c

P.S. 雖然全域安裝的套件看起來很方便，但是它們可能會導致版本管理的問題。例如，如果當兩個專案都依賴於同一個套件，但是需要使用該套件的不同版本，那麼全域安裝就無法滿足這種需求。因此，通常建議在每個專案中局部安裝所需的套件。
