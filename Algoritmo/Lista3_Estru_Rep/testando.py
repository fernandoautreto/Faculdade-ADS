def contagem(n):
    if n == 0:
        print(0)
    else:
        print(n)
        contagem(n - 1)

contagem(5)
        


