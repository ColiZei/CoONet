// import { MutationTypes } from './mutation-types'
import { MutationTree } from "vuex";
import { RootState as State } from "./state";

export type Mutations<S = State> = {
  // [MutationTypes.MY_MUTATION](state: S, payload: number): void
};

export const mutations: MutationTree<State> & Mutations = {
  // [MutationTypes.MY_MUTATION](state, payload: number) {
  //   state.counter = payload
  // },
};
