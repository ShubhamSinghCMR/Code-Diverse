from collections import defaultdict

list=[]
class Trie:
    
   
    def __init__(self):
        self.root = defaultdict()
        


    def insertstring(self, word):
        current = self.root
        list.append(word);
        for letter in word:
            current = current.setdefault(letter,{})
        current.setdefault("end")
        

    
    def search(self, word):
        current = self.root
        for letter in word:
            if letter not in current:
                return False
            current = current[letter]
        if "end" in current:
            return True
        return False

    def prefix(self,prefixword):
        current=self.root
        
        for i in list:
            c=0
            for letter in prefixword:
                
                if (i[c]!=prefixword[c]):
                    break;
                c+=1
            if (c==len(prefixword)):
                print i
           ## current=current[letter]
            ##return "-1";

        


test = Trie()
for i in range(0,4):
    test.insertstring(str(raw_input("insert the strings in the dictionary")))
    
print test.search(str(raw_input("enter the string which user wants to search")))
##st=str(raw_input("enter the prefix"))
st=test.prefix(str(raw_input("enter the prefix by which to search the string")))


