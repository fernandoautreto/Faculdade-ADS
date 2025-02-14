# No final do ano muitas pessoas compram presentes. Para identificar o perfil dos compradores numa loja de roupas, faça um programa que registre os dados de algumas pessoas, pergunte “Deseja cadastrar outro (‘s’/’n’)?”. Enquanto a resposta for s repete, quando for n encerra e repetição e apresente os seguintes resultados:
# a) Quantidade de pessoas de gênero f - feminino e m - mesculino;

# b) Quantidade de pessoas de gênero feminino abaixo e acima de 18 anos

# c) Quantidade de pessoas de gênero masculino abaixo e acima de 18 anos

# Observaçãos: use as letras f/m na condição da estrutura de decisão
m = 0
f = 0
m_maior_18 = 0
m_menor_18 = 0
f_maior_18 = 0
f_menor_18 = 0

genero = input('Qual é o sexo (M/F): ').lower()
while genero == 'm' or genero == 'f':
    if genero == 'm':
        idade = int(input('Digite a idade: '))
        m += 1
        if idade >= 18:
            m_maior_18 += 1
        if idade < 18:
            m_menor_18 += 1
    if genero == 'f':
        idade = int(input('Digite a idade: '))
        f += 1
        if idade >= 18:
            f_maior_18 += 1
        if idade < 18:
            f_menor_18 += 1
    decisao = input('Deseja continuar? (S/N): ').upper()
    if decisao == 'S':
        genero = input('Qual é o sexo (M/F): ').lower()
    elif decisao == 'N':
        break

print(m, m_maior_18, m_menor_18)
print(f, f_maior_18, f_menor_18)
