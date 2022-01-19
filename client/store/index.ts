import type { Context } from '@nuxt/types'
import type { GetterTree, ActionTree, MutationTree } from 'vuex'






export interface RootState {
  description: string,
  islogged: number,
  userid: number,
  token: string
}

export const state = (): RootState => ({
  description: "I'm defined as an initial state",
  islogged: 0,
  token: "",
  userid: 0
})

export const getters: GetterTree<RootState, RootState> = {
  reversedName: (state): string => state.description.split('').reverse().join(''),
  islogged: (state): number => state.islogged,
  userid: (state): number => state.userid,
  token: (state): string => state.token,
}

export const MutationType = {
  CHANGE_DESCRIPTION: 'changeDescription',
  CHANGE_ISLOGGED: 'changeislogged',
  CHANGE_TOKEN: 'changetoken',
  CHANGE_USERID: 'changeuserid'
}

export const mutations: MutationTree<RootState> = {
  [MutationType.CHANGE_DESCRIPTION]: (state, newDescription: string) => { state.description = newDescription },
  [MutationType.CHANGE_ISLOGGED]: (state, newislogged: number) => { state.islogged = newislogged },
  [MutationType.CHANGE_TOKEN]: (state, newtoken: string) => { state.token = newtoken },
  [MutationType.CHANGE_USERID]: (state, newuserid: number) => { state.userid = newuserid }
}

export const actions: ActionTree<RootState, RootState> = {
  nuxtServerInit ({ commit }, _context: Context) {
    commit(MutationType.CHANGE_DESCRIPTION, "I'm defined by server side")
  },
}
